<?php
namespace App\Repositories\Team;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class TeamRepository extends BaseRepository implements TeamRepositoryInterface{
    public function __construct(Team $team){
        parent::__construct($team);
    }
}
