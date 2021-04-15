<?php

namespace Modules\Iplan\Repositories\Cache;

use Modules\Iplan\Repositories\PlanuserRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePlanuserDecorator extends BaseCacheDecorator implements PlanuserRepository
{
    public function __construct(PlanuserRepository $planuser)
    {
        parent::__construct();
        $this->entityName = 'iplan.planusers';
        $this->repository = $planuser;
    }
    public function getItemsBy($params)
    {
      return $this->remember(function () use ($params) {
        return $this->repository->getItemsBy($params);
      });
    }

    public function getItem($criteria, $params)
    {
      return $this->remember(function () use ($criteria, $params) {
        return $this->repository->getItem($criteria, $params);
      });
    }


    public function updateBy($criteria, $data, $params)
    {
      return $this->remember(function () use ($criteria, $data, $params) {
        return $this->repository->updateBy($criteria, $data, $params);
      });
    }

    public function deleteBy($criteria, $params)
    {
      return $this->remember(function () use ($criteria, $params) {
        return $this->repository->deleteBy($criteria, $params);
      });
    }
}
