<?php

namespace App\Http\Resources\Api\v1;

use App\Models\Framework;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeveloperResource extends JsonResource
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
            'site_count' => $this->site()->count(),
            'site_link' => route('sites', ['developer_id' => $this->id]),

            'frameworks' => Framework::whereIn('id', $this->framework()->select('framework_id')->get()->toArray())
                ->select('name')
                ->get()
                ->map(fn($item) => $item->name),
            'salary' => $this->salary,
        ];
    }
}
