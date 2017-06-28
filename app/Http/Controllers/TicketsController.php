<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TicketCreateRequest;
use App\Http\Requests\TicketUpdateRequest;
use App\Repositories\TicketRepository;
use App\Validators\TicketValidator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class TicketsController extends Controller
{

    /**
     * @var TicketRepository
     */
    protected $repository;

    /**
     * @var TicketValidator
     */
    protected $validator;

    public function __construct(TicketRepository $repository, TicketValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $tickets = $this->repository->paginate(5);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tickets,
            ]);
        }

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TicketCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */

    public function geraCode($limit)
    {

        $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code= "";

        for ($i = 0; $i <= $limit; $i++)
        {
             $code .= strtoupper($basic[rand(0, strlen($basic) - 1)]);

        }
        return $code;
    }
    public function store(Request $request)
    {

        $data = $request->all();

        for($i = 0; $i <= $data['quantity']; $i++)
        {
            $code = $this->geraCode($data['quantity']);
            $data['code'] = base64_encode(QrCode::format('png')->size(300)->generate($code));

            $this->repository->create($data);
        }



    }


    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ticket,
            ]);
        }

        return view('tickets.show', compact('ticket'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ticket = $this->repository->find($id);

        return view('tickets.edit', compact('ticket'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TicketUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TicketUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ticket = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Ticket updated.',
                'data'    => $ticket->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Ticket deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Ticket deleted.');
    }
}
