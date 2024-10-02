<?php

namespace Src\Controllers\Api;

use Src\Models\Users\User;
use Src\Controllers\Controller;
use Src\Models\Goods\Good;
use Src\Exceptions\NotFoundException;

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
        $articles = Good::findAll();

        if ($articles === null) {
            throw new NotFoundException();
        }

        $this->view->displayJson([
            'goods' => $goods
        ]);
    }

    public function add()
    {
        $input = $this->getInputData();
        $goodFromRequest = $input['good'][0];
        $ownerId = $goodFromRequest['owner_id'];
        $owner = User::getById($ownerId);
        $good = Good::createGood($goodFromRequest, $owner);

        header('Location: /binocles/api/goods/' . $good->getId(), true, 302);
    }

    public function edit(int $goodId)
    {
        $input = $this->getInputData();
        $good = Good::getById($goodId);

        if ($good === null) {
            throw new NotFoundException("Good not found");
        }

        $goodFromRequest = $input['good'][0];
        // var_dump($articleFromRequest);
        $good->updateGood($goodFromRequest);

        header('Location: /binocles/api/good/' . $good->getId(), true, 302);
    }

    public function delete(int $goodId)
    {
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
