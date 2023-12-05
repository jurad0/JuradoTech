<?php
class Employee
{
    #atributos de tablas
    protected $employee_id;
    protected $emp_name;
    protected $job_title;
    protected $emp_description;
    protected $image;



    public function __construct($employee_id, $emp_name, $job_title, $emp_description, $image)
    {
        $this->employee_id = $employee_id;
        $this->emp_name = $emp_name;
        $this->job_title = $job_title;
        $this->emp_description = $emp_description;
        $this->image = $image;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }

    public function __set($attribute, $value)
    {
        $this->$attribute = $value;
    }

    public function dataPush($data, $value)
    {
        $this->{$data}[] = $value;
    }

    public function __toString()
    {
        return $this->employee_id . " " . $this->emp_name . " " . $this->job_title . " " . $this->emp_description . " " . $this->image;
    }
}
?>