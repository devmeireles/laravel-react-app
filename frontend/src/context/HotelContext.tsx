import { useQuery } from "@tanstack/react-query";
import { ReactNode, createContext, useContext } from "react";
import IHotel from "../types/IHotel";
import { getHotel } from "../services/hotel.service";
import { useLocation, useParams } from "react-router-dom";

export interface IHotelContext {
    loading: boolean,
    isFetched: boolean,
    item: IHotel | null;
}

const defaultState: IHotelContext = {
    loading: false,
    isFetched: false,
    item: null

}

export const HotelContext = createContext<IHotelContext>(defaultState);

export const useHotelContext = (): IHotelContext => {
    const context = useContext(HotelContext);
    if (!context) {
        throw new Error("useHotelContext must be used within a HotelProvider");
    }
    return context;
};

type HotelProviderProps = {
    children: ReactNode;
};

export const HotelProvider: React.FC<HotelProviderProps> = ({ children }) => {
    const { id } = useParams();

    const hotelQuery = useQuery({
        queryKey: [''],
        queryFn: () => getHotel(Number(id))
    })

    const hotel = hotelQuery.data ?? [];

    const contextValues: IHotelContext = {
        loading: hotelQuery.isLoading,
        isFetched: hotelQuery.isFetched,
        item: hotel.data
    }

    return <HotelContext.Provider value={contextValues}>{children}</HotelContext.Provider>

}