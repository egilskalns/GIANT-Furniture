<?php

namespace App\Services\Profile;

use App\Models\User;

class Service
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index() {

    }

    public function getUser() {
        return $this->model->where('id', auth()->id())->first();
    }

    public function store($request): void
    {

    }

    public function update($request): void
    {

    }

    public function destroy($id): void
    {

    }
}