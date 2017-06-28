<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Ticket;

/**
 * Class TicketTransformer
 * @package namespace App\Transformers;
 */
class TicketTransformer extends TransformerAbstract
{

    /**
     * Transform the \Ticket entity
     * @param \Ticket $model
     *
     * @return array
     */
    public function transform(Ticket $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
