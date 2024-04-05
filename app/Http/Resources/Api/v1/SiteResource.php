<?php

namespace App\Http\Resources\Api\v1;

use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'framework' => $this->framework?->name,
            'coast' =>  Developer::whereIn('id', $this->developer()->select('developer_id')->get()->toArray())
                ->select('salary')
                ->get()
                ->sum('salary'),
            'developer_count' => $this->developer()->count(),
            'developer_link' => route('developers', ['site_id' => $this->id])
        ];
    }
}
