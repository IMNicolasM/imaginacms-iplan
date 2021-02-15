<?php

namespace Modules\Iplan\Entities;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $table = 'iplan__subscriptions';
    protected $fillable = [
      "name",
      "description",
      "category_name",
      "entity",
      "entity_id",
      "frequency",
      "start_date",
      "end_date",
    ];

    public function limits()
    {
      return $this->hasMany(SubscriptionLimit::class,"subscription_id");
    }
}
