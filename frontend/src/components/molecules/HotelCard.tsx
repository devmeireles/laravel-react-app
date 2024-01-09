import React from 'react'
import IHotel from '../../types/IHotel'
import Title from '../atoms/text/Title'
import Paragraph from '../atoms/text/Paragraph'

interface HotelCardProps {
  hotel: IHotel
}

const HotelCard: React.FC<HotelCardProps> = ({ hotel }) => {
  return (
    <div className="my-8 rounded shadow-md border border-gray-50 duration-300 hover:-translate-y-1">
      <a href={`/hotels/${hotel.id}`} className="cursor-pointer">
        <figure>
          <img src={hotel.image} className="rounded-t h-72 w-full object-cover" />

          <figcaption className="p-4">
            <Title className="font-semibold">{hotel.name}</Title>

            <Paragraph>{hotel.stars} starts hotel in {hotel.city}</Paragraph>
          </figcaption>
        </figure>
      </a>
    </div>
  )
}

export default HotelCard