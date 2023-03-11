<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Throwable;

/**
 * Class ProductControllerController
 * @package  App\Http\Controllers
 */
class ProductController extends Controller
{
    private ProductService $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *  path="/products",
     *  operationId="indexProduct",
     *  tags={"Products"},
     *  summary="Get list of Product",
     *  description="Returns list of Product",
     *  @OA\Response(response=200, description="Successful operation",
     *    @OA\JsonContent(ref="#/components/schemas/Products"),
     *  ),
     * )
     *
     * Display a listing of Product.
     * @return LengthAwarePaginator
     * @throws Throwable
     */
    public function index(): LengthAwarePaginator
    {
        return $this->service->paginatedList();
    }

    /**
     * @OA\Post(
     *  operationId="storeProduct",
     *  summary="Insert a new Product",
     *  description="Insert a new Product",
     *  tags={"Products"},
     *  path="/products",
     *  @OA\RequestBody(
     *    description="Product to create",
     *    required=true,
     *    @OA\MediaType(
     *      mediaType="application/json",
     *      @OA\Schema(
     *      @OA\Property(
     *      title="data",
     *      property="data",
     *      type="object",
     *      ref="#/components/schemas/Product")
     *     )
     *    )
     *  ),
     *  @OA\Response(response="201",description="Product created",
     *     @OA\JsonContent(
     *      @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Product"
     *      ),
     *    ),
     *  ),
     *  @OA\Response(response=422,description="Validation exception"),
     * )
     *
     * @param StoreProductRequest $request
     * @return array|Builder|Collection|Product|Builder[]|Product[]
     * @throws Throwable
     */
    public function store(StoreProductRequest $request): array|Builder|Collection|Product
    {
        return $this->service->createModel($request->validated('data'));

    }

    /**
     * @OA\Get(
     *   path="/products/{product_id}",
     *   summary="Show a Product from his Id",
     *   description="Show a Product from his Id",
     *   operationId="showProduct",
     *   tags={"Products"},
     *   @OA\Parameter(ref="#/components/parameters/Product--id"),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *       @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Product"
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response="404",description="Product not found"),
     * )
     *
     * @param $productId
     * @return array|Builder|Collection|Product
     * @throws Throwable
     */
    public function show($productId): array|Builder|Collection|Product
    {
        return $this->service->getModelById($productId);
    }

    /**
     * @OA\Patch(
     *   operationId="updateProduct",
     *   summary="Update an existing Product",
     *   description="Update an existing Product",
     *   tags={"Products"},
     *   path="/products/{product_id}",
     *   @OA\Parameter(ref="#/components/parameters/Product--id"),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *       @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Product"
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response="404",description="Product not found"),
     *   @OA\RequestBody(
     *     description="Product to update",
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *        @OA\Property(
     *        title="data",
     *        property="data",
     *        type="object",
     *        ref="#/components/schemas/Product")
     *      )
     *     )
     *   )
     *
     * )
     *
     * @param UpdateProductRequest $request
     * @param int $productId
     * @return array|Builder|Builder[]|Collection|Product|Product[]
     * @throws Throwable
     */
    public function update(UpdateProductRequest $request,int $productId): array|Product|Collection|Builder
    {
        return $this->service->updateModel($request->validated('data'),$productId);

    }

    /**
     * @OA\Delete(
     *  path="/products/{product_id}",
     *  summary="Delete a Product",
     *  description="Delete a Product",
     *  operationId="destroyProduct",
     *  tags={"Products"},
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *       @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Product"
     *       ),
     *     ),
     *   ),
     *  @OA\Parameter(ref="#/components/parameters/Product--id"),
     *  @OA\Response(response=204,description="No content"),
     *  @OA\Response(response=404,description="Product not found"),
     * )
     *
     * @param int $productId
     * @return array|Builder|Builder[]|Collection|Product|Product[]
     * @throws Throwable
     */
    public function destroy(int $productId): array|Builder|Collection|Product
    {
        return $this->service->deleteModel($productId);
    }
}
