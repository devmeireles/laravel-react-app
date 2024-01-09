<?php

namespace App\Services;

use App\Repositories\HotelRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HotelService
{
    protected $hotelRepository;

    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    /**
     * Get all hotels.
     *
     * @return array
     */
    public function getAllHotels()
    {
        try {
            $hotels = $this->hotelRepository->all();
            return ['success' => true, 'data' => $hotels];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Get a hotel by ID.
     *
     * @param int $id
     * @return array
     */
    public function getHotelById($id)
    {
        try {
            $hotel = $this->hotelRepository->findOrFail($id);
            return ['success' => true, 'data' => $hotel];
        } catch (ModelNotFoundException $e) {
            return ['success' => false, 'error' => 'Hotel not found'];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Create a new hotel.
     *
     * @param array $data
     * @return array
     */
    public function createHotel(array $data)
    {
        try {
            $hotel = $this->hotelRepository->create($data);
            return ['success' => true, 'data' => $hotel];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Update a hotel.
     *
     * @param Hotel $hotel
     * @param array $data
     * @return array
     */
    public function updateHotel($hotel, array $data)
    {
        try {
            $updatedHotel = $this->hotelRepository->update($hotel, $data);
            return ['success' => true, 'data' => $updatedHotel];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Delete a hotel.
     *
     * @param Hotel $hotel
     * @return array
     */
    public function deleteHotel($hotel)
    {
        try {
            $this->hotelRepository->delete($hotel);
            return ['success' => true, 'message' => 'Hotel deleted successfully'];
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
