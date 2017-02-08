<?php

namespace App\Http\Models;

class Organization extends BaseModel {
	protected $table = 'organization';
	protected $primaryKey = 'organization_id';
	public $timestamps = false;
    private $input_data = array(
        'organization_id'=>null,
        'type'=>null,
        'city_code'=>null,
        'name'=>null,
        'address'=>null,
        'telno'=>null,
        'used'=>null,
    );

    public function _init($data)
    {
        foreach ($data as $key => $value) {
            $this->input_data[$key] = $value;
        }
    }

    /**
     * 回傳科目列表
     *
     * @return mixed
     */
    public function get_list()
    {
        $temp_obj = Organization::select('organization_id', 'type', 'city_code', 'name', 'address', 'telno', 'used')
            ->orderby('organization_id', 'ASC')
            ->paginate(20);
        return $temp_obj;
    }

    /**
     * 新增 學校
     *
     * @return mixed
     */
    public function add()
    {
        if ($this->input_data['organization_id']) {
            $temp_obj = Organization::where('organization_id', $this->input_data['organization_id'])->get();
            if(count($temp_obj) == 0){
                $temp_obj = new Organization();
                $temp_obj->organization_id = $this->input_data['organization_id']?$this->input_data['organization_id']:'';
                $temp_obj->type = $this->input_data['type']?$this->input_data['type']:'';
                $temp_obj->city_code = $this->input_data['city_code']?$this->input_data['city_code']:'';
                $temp_obj->name = $this->input_data['name']?$this->input_data['name']:'';
                $temp_obj->address = $this->input_data['address']?$this->input_data['address']:'';
                $temp_obj->telno = $this->input_data['telno']?$this->input_data['telno']:'';
                $temp_obj->used = $this->input_data['used']?$this->input_data['used']:'';
                $temp_obj->save();

                return true;
            }
        }

        return false;
    }

    /**
     * 更新
     *
     * @return mixed
     */
    public function update_data()
    {
        if ($this->input_data['organization_id'])
        {
            Organization::where('organization_id', $this->input_data['organization_id'])
                ->update([
                    'type' => $this->input_data['type']?$this->input_data['type']:'',
                    'city_code' => $this->input_data['city_code']?$this->input_data['city_code']:'',
                    'name' => $this->input_data['name']?$this->input_data['name']:'',
                    'address' => $this->input_data['address']?$this->input_data['address']:'',
                    'telno' => $this->input_data['telno']?$this->input_data['telno']:'',
                    'used' => $this->input_data['used']?$this->input_data['used']:''
                ]);

            return true;
        }

        return false;
    }

    /**
     * 刪除
     *
     * @return mixed
     */
    public function delete_data()
    {
        if ( $this->input_data['organization_id'] )
        {
            Organization::where('organization_id', $this->input_data['organization_id'])->delete();

            return true;
        }

        return false;
    }
}
