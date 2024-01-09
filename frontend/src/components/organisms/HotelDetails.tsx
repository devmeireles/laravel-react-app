import React from 'react';
import Title from '../atoms/text/Title';
import Paragraph from '../atoms/text/Paragraph';


type HotelDetailsProps = {
  title: string;
  location: string;
  description: string;
};

const HotelDetails: React.FC<HotelDetailsProps> = ({ title, location, description }) => {
  return (
    <div className='w-7/12'>
      <div className='py-6 flex flex-col gap-3'>
        <span className='mb-1'>
          <Title>{title}</Title>
        </span>
        <span>
          <Title className='text-xl'>{location}</Title>
        </span>
        <span>
          <Paragraph>{description}</Paragraph>
        </span>
      </div>
    </div>
  );
};

export default HotelDetails;
