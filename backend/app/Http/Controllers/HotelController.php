<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use Illuminate\Http\Request;
use App\Services\HotelService;
use App\Traits\ResponseTrait;

/**
 * @OA\Tag(
 *     name="hotels",
 *     description="Access to hotels endpoints",
 * )
 */
class HotelController extends Controller
{
    use ResponseTrait;

    protected $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    /**
     * Display a listing of hotel.
     *
     * @return JsonResponse
     * 
     * @OA\Get(
     *     path="/api/hotels",
     *      tags={"hotels"},
     *     description="List of hotels",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Hotel")
     *         ),
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     * )
     */
    public function index()
    {
        $hotels = $this->hotelService->getAllHotels();
        return $this->jsonResponse($hotels);
    }

    /**
     * Display the specified hotel.
     *
     * @param int $id
     * @return JsonResponse
     * 
     * @OA\Get(
     *     path="/api/hotels/{id}",
     *      tags={"hotels"},
     *     description="List of hotels",
     *     @OA\Response(response="default", description="Display the specified hotel"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Hotel")
     *         ),
     *     ),
     *     
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             type="number",
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $hotel = $this->hotelService->getHotelById($id);
        return $this->jsonResponse($hotel);
    }

    /**
     * Store a newly created hotel in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * 
     * @OA\Post(
     *     path="/api/hotels",
     *     tags={"hotels"},
     *     description="Place a hotel",
     *     @OA\RequestBody(
     *         description="Hotel data",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(property="name", type="string", description="Hotel name"),
     *                 @OA\Property(property="image", type="string", description="Image URL"),
     *                 @OA\Property(property="city", type="string", description="Hotel city"),
     *                 @OA\Property(property="address", type="string", description="Hotel address"),
     *                 @OA\Property(property="description", type="string", description="Hotel description"),
     *                 @OA\Property(property="stars", type="number", description="Hotel stars"),
     *             )
     *         )
     *     ),
     *     @OA\Response(response="default", description="Display the specified hotel")
     * )
     */
    public function store(StoreHotelRequest  $request)
    {
        $hotel = $this->hotelService->createHotel($request->validated());
        return $this->jsonResponse($hotel);
    }

    /**
     * Update the specified hotel in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * 
     * @OA\Patch(
     *     path="/api/hotels/{id}",
     *      tags={"hotels"},
     *     description="Update a hotel",
     *     @OA\Response(response="default", description="Display the updated hotel"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             type="number",
     *         )
     *     ),
     * 
     *      @OA\RequestBody(
     *         description="Hotel data",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(property="name", type="string", description="Hotel name"),
     *                 @OA\Property(property="image", type="string", description="Image URL"),
     *                 @OA\Property(property="city", type="string", description="Hotel city"),
     *                 @OA\Property(property="address", type="string", description="Hotel address"),
     *                 @OA\Property(property="description", type="string", description="Hotel description"),
     *                 @OA\Property(property="stars", type="number", description="Hotel stars"),
     *             )
     *         )
     *     ),
     * )
     */
    public function update(UpdateHotelRequest $request, $id)
    {
        $hotel = $this->hotelService->getHotelById($id);

        if (!$hotel) {
            return $this->jsonResponse(['success' => false, 'error' => 'Hotel not found']);
        }

        $updatedHotel = $this->hotelService->updateHotel($hotel['data'], $request->validated());
        return $this->jsonResponse($updatedHotel);
    }

    /**
     * Remove the specified hotel from storage.
     *
     * @param int $id
     * @return JsonResponse
     * 
     * @OA\Delete(
     *     path="/api/hotels/{id}",
     *      tags={"hotels"},
     *     description="Delete a hotel",
     *     @OA\Response(response="default", description=""),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             type="number",
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {
        $hotel = $this->hotelService->getHotelById($id);

        if (!$hotel) {
            return $this->jsonResponse(['success' => false, 'error' => 'Hotel not found']);
        }

        $hotelDelete = $this->hotelService->deleteHotel($hotel['data']);

        return $this->jsonResponse([
            'success'   => true,
            'data'  => null,
        ]);
    }
}
