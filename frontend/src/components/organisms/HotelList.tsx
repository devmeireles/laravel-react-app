import React from 'react';
import HotelCard from '../molecules/HotelCard';
import IHotel from '../../types/IHotel';

interface HotelListProps {
  hotels: IHotel[]
}

const HotelList: React.FC<HotelListProps> = ({ hotels }) => (
  <div className="grid grid-flow-row gap-8 text-neutral-600 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    {hotels && hotels.map((hotel) => <HotelCard key={hotel.id} hotel={hotel} />)}
  </div>
);

export default HotelList;