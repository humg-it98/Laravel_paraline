<?php
namespace App\Repositories\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface {
    public function __construct(Employee $employee){
        parent::__construct($employee);
    }
}
