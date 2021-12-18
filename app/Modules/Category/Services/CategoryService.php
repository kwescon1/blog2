<?php

namespace App\Modules\Category\Services;

use App\Modules\Base\Services\CoreService;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Category\Contracts\CategoryServiceInterface;
use App\Modules\Category\Contracts\CategoryRepositoryInterface;


class CategoryService extends CoreService implements CategoryServiceInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): ?Collection
    {
        return $this->categoryRepository->all();
    }

    public function trashedCategories(): ?Collection
    {
        return $this->categoryRepository->trashedCategories();
    }

    public function store($data): \Illuminate\Database\Eloquent\Model
    {
        $data['name'] = strtoupper($data['name']);

        return $this->categoryRepository->create($data);
    }

    public function edit($id): ?array
    {

        $cat = $this->categoryRepository->find($id);

        return [
            'form_name' => 'Edit Category',
            'data' => $cat
        ];
    }

    public function update($data, $id): void
    {
        $this->categoryRepository->update($id, $data);
    }

    public function softDeleteCat($id): void
    {
        $this->categoryRepository->delete($id);
    }

    public function restoreCat($id): void
    {
        $this->categoryRepository->restoreCat($id);

        return;
    }

    public function destroy($id): void
    {
        $this->categoryRepository->destroy($id);

        return;
    }

    public function show($id): ?object
    {
        return $this->categoryRepository->find($id);
    }
}
