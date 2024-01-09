import React from 'react';

type HotelImageHeaderProps = {
  imageUrl: string;
};

const HotelImageHeader: React.FC<HotelImageHeaderProps> = ({ imageUrl }) => {
  return (
    <div
      className={`header h-96 md:h-[60vh] min-w-max bg-cover bg-no-repeat bg-center`}
      style={{ backgroundImage: `url('${imageUrl}')` }}
    />
  );
};

export default HotelImageHeader;
