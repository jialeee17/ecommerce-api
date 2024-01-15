<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\State;
use Illuminate\Http\Request;
use App\Repositories\StateRepository;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;

class StateController extends Controller
{
    private $stateRepository;

    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    public function index()
    {
        try {
            $states = $this->stateRepository->getAllStates();

            return new ApiSuccessResponse(
                $states,
                str_replace(':name', 'States', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string'],
                'country_id' => ['required', 'integer', 'exists:countries,id'],
            ]);

            $data = [
                'name' => $request->name,
                'country_id' => $request->country_id,
            ];

            $state = $this->stateRepository->createState($data);

            return new ApiSuccessResponse(
                $state,
                str_replace(':name', 'State', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(State $state)
    {
        try {
            return new ApiSuccessResponse(
                $state,
                str_replace(':name', 'State', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, State $state)
    {
        try {
            $request->validate([
                'name' => ['required', 'string'],
                'country_id' => ['required', 'integer', 'exists:countries,id'],
            ]);

            $data = [
                'name' => $request->name,
                'country_id' => $request->country_id,
            ];

            $data = $this->stateRepository->updateState($state->id, $data);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'State', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(State $state)
    {
        try {
            $this->stateRepository->deleteState($state->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'State', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
