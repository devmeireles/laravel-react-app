import React, { useEffect, useState } from 'react';
import { HotelProvider, useHotelContext } from '../context/HotelContext';
import HotelImageHeader from '../components/molecules/HotelImageHeader';
import HotelDetails from '../components/organisms/HotelDetails';

const HotelPage = () => {
  const { isFetched, item, loading } = useHotelContext();
  const [hotelTitle, setHotelTitle] = useState<string>('')

  useEffect(() => {
    if (item) {
      const { name, stars } = item;
      let output = '';

      output += name ?? null
      output += stars && `, ${stars} stars`

      setHotelTitle(output);
    }
  }, [item])

  return (
    <div className='hotel-screen min-h-screen flex flex-col'>
      {loading && <h1>Loading</h1>}
      {(isFetched && item) && (
        <>
          <HotelImageHeader imageUrl={item.image} />
          <HotelDetails title={hotelTitle} location={`${item.city}, ${item.address}`} description={item.description} />
        </>
      )}
    </div>
  );
};

const Hotel = () => {
  return (
    <HotelProvider>
      <HotelPage />
    </HotelProvider>
  )
}

export default Hotel;
