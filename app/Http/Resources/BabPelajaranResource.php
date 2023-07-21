<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BabPelajaranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    private $msg;
    private $status;

    public function __construct($status,$msg,$resource)
    {
        parent::__construct($resource);
        $this->msg = $msg;
        $this->status = $status;
    }
    public function toArray(Request $request): array
    {
        return [
            'status' => $this->status,
            'message' => $this->msg,
            'data' => $this->resource
        ];
    }

}
