<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepository
{
    /**
     * Get all hotels.
     *
     * @return Hotel[]
     */
    public function all()
    {
        return Hotel::orderBy('id', 'desc')->get(['id', 'name', 'image', 'city', 'stars']);
    }

    /**
     * Find a hotel by ID or throw a ModelNotFoundException.
     *
     * @param int $id
     * @return Hotel
     */
    public function findOrFail($id)
    {
        return Hotel::findOrFail($id);
    }

    /**
     * Create a new hotel.
     *
     * @param array $data
     * @return Hotel
     */
    public function create(array $data)
    {
        return Hotel::create($data);
    }

    /**
     * Update a hotel.
     *
     * @param Hotel $hotel
     * @param array $data
     * @return Hotel
     */
    public function update($hotel, array $data)
    {
        $hotel->update($data);
        return $hotel;
    }

    /**
     * Delete a hotel.
     *
     * @param Hotel $hotel
     * @return void
     */
    public function delete($hotel)
    {
        $hotel->delete();
    }
}
