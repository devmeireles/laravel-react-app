<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *   schema="Hotel",
 *   type="object",
 * )
 * Class Hotel
 * @package Incase\Models
 */
class Hotel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'image', 'city', 'address', 'description', 'stars'];

    /**
     * @OA\Property(
     *     format="int64",
     *     description="id",
     *     title="id",
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     format="string",
     *     description="name",
     *     title="name",
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     format="string",
     *     description="image",
     *     title="image",
     * )
     *
     * @var string
     */
    private $image;

    /**
     * @OA\Property(
     *     format="string",
     *     description="city",
     *     title="city",
     * )
     *
     * @var string
     */
    private $city;

    /**
     * @OA\Property(
     *     format="string",
     *     description="address",
     *     title="address",
     * )
     *
     * @var string
     */
    private $address;

    /**
     * @OA\Property(
     *     format="string",
     *     description="description",
     *     title="description",
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     format="int",
     *     description="stars",
     *     title="stars",
     * )
     *
     * @var int
     */
    private $stars;
}
