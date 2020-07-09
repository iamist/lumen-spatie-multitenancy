<?php

namespace App\Multitenancy\TenantFinder;

use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Concerns\UsesTenantModel;
use Spatie\Multitenancy\TenantFinder\TenantFinder;
use Spatie\Multitenancy\Models\Tenant;

class TenantIdFinder extends TenantFinder
{
    use UsesTenantModel;

    public function findForRequest(Request $request):?Tenant
    {
        $tenantId = $request->header('tenant-id');

        return $this->getTenantModel()::where([
            'business_id_fk' => $tenantId
        ])->first();
    }
}
