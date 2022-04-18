<?php
namespace App\Interfaces;

use Illuminate\Http\Client\Request;

interface IRepository {
    public function read($templateId);
    public function create(Request $request);
    public function delete();
    public function update();
}