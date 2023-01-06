<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupport;
use App\Http\Resources\ReplySupportResource;
use App\Repositories\ReplySupportRepository;


class ReplySupportController extends Controller
{
    protected $repository;

    public function __construct(ReplySupportRepository $replyRepository)
    {
        $this->repository = $replyRepository;
    }

    public function createReply(StoreReplySupport $request)
    {
        $reply = $this->repository->createReplySupport($request->validated());

        return new ReplySupportResource($reply);
    }

}
