<?php
    namespace App\Repositories\Group;

    use Illuminate\Database\Eloquent\Model;
    use App\Models\Group;
    use App\Repositories\BaseRepository;
    use App\Repositories\BaseRepositoryInterface;

    class GroupRepository extends BaseRepository implements GroupRepositoryInterface{
        public function __construct(Group $group){
            parent::__construct($group);
        }
    }
