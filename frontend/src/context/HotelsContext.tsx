import { useQuery } from "@tanstack/react-query";
import { ReactNode, createContext, useContext } from "react";
import IHotel from "../types/IHotel";
import { listHotels } from "../services/hotel.service";

export interface IHotelsContext {
    loading: boolean,
    isFetched: boolean,
    items: IHotel[] | [];
}

const defaultState: IHotelsContext = {
    loading: false,
    isFetched: false,
    items: []
}

export const HotelsContext = createContext<IHotelsContext>(defaultState);

export const useHotelsContext = (): IHotelsContext => {
    const context = useContext(HotelsContext);
    if (!context) {
        throw new Error("useHotelsContext must be used within a HotelsProvider");
    }
    return context;
};

type HotelsProviderProps = {
    children: ReactNode;
};

export const HotelsProvider: React.FC<HotelsProviderProps> = ({ children }) => {
    const hotelsQuery = useQuery({
        queryKey: ['hotels'],
        queryFn: () => listHotels()
    });

    const hotels = hotelsQuery.data ?? [];

    const contextValues: IHotelsContext = {
        loading: hotelsQuery.isLoading,
        isFetched: hotelsQuery.isFetched,
        items: hotels.data
    }

    return <HotelsContext.Provider value={contextValues}>{children}</HotelsContext.Provider>

}