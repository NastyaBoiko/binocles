<?php

namespace Src\Controllers\Api;

use Src\Models\Users\User;
use Src\Controllers\Controller;
use Src\Models\Goods\Good;
use Src\Exceptions\NotFoundException;
use Src\Exceptions\UnauthorizedException;

class GoodsApiController extends Controller
{
    public function view(int $goodId): void
    {
        $good = Good::getById($goodId);

        if ($good === null) {
            throw new NotFoundException();
        }

        $this->view->displayJson([
            'good' => $good
        ]);
    }

    public function all()
    {
        $goods = Good::findAll();

        if ($goods === null) {
            throw new NotFoundException();
        }

        $this->view->displayJson([
            'goods' => $goods
        ]);
    }

    public function add()
    {
        if ($this->user === null) {
            throw new UnauthorizedException("User not found");
        }
        $input = $this->getInputData();
        $goodFromRequest = $input['good'][0];
        $ownerId = $goodFromRequest['owner_id'];
        $owner = User::getById($ownerId);
        $good = Good::createGood($goodFromRequest, $owner);

        $this->view->displayJson([
            'good' => $good
        ]);
    }

    public function edit(int $goodId)
    {
        if ($this->user === null) {
            throw new UnauthorizedException("User not found");
        }
        $input = $this->getInputData();
        $good = Good::getById($goodId);

        if ($good === null) {
            throw new NotFoundException("Good not found");
        }

        $goodFromRequest = $input['good'][0];
        // var_dump($articleFromRequest);
        $good->updateGood($goodFromRequest);

        $this->view->displayJson([
            'good' => $good
        ]);
    }

    public function delete(int $goodId)
    {
        if ($this->user === null) {
            throw new UnauthorizedException("User not found");
        }
        
        $good = Good::getById($goodId);
        if ($good === null) {
            throw new NotFoundException('Good already deleted');
        }

        $good->delete();

        $this->view->displayJson([
            'method' => 'DELETE',
            'id' => $goodId
        ]);
    }
}
