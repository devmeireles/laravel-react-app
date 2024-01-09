import React from 'react';
import { HotelsProvider, useHotelsContext } from '../context/HotelsContext';
import Title from '../components/atoms/text/Title';
import HotelList from '../components/organisms/HotelList';
import EmptyList from '../components/organisms/EmptyList';

const IndexPage = () => {
  const { isFetched, items, loading } = useHotelsContext();

  return (
    <section className="hotels-screen">
      {loading && <h1>Loading</h1>}

      {
        isFetched && (
          <>
            <Title className="text-gray-600 text-3xl font-bold">Hotels</Title>
            {items && items.length > 0 ?
              <HotelList hotels={items} /> :
              <EmptyList />
          }
          </>
        )
      }
    </section>
  );
};

const Index = () => {
  return (
    <HotelsProvider>
      <IndexPage />
    </HotelsProvider>
  )
}

export default Index;
