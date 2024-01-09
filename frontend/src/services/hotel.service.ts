import axios from 'axios';

const HOTELS_BASE_API = `${import.meta.env.VITE_API_URL}/hotels`

export const listHotels = () => axios.get(HOTELS_BASE_API).then(res => res.data);
export const getHotel = (id: number) => axios.get(`${HOTELS_BASE_API}/${id}`).then(res => res.data);