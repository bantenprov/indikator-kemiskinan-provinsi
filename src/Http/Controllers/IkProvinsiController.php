<?php namespace Bantenprov\IkProvinsi\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\IkProvinsi\Facades\IkProvinsi;

/* Models */
use Bantenprov\IkProvinsi\Models\Bantenprov\IkProvinsi\IkProvinsi as IkModel;
use Bantenprov\IkProvinsi\Models\Bantenprov\IkProvinsi\Province;
use Bantenprov\IkProvinsi\Models\Bantenprov\IkProvinsi\Regency;

/* etc */
use Validator;

/**
 * The IkProvinsiController class.
 *
 * @package Bantenprov\IkProvinsi
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class IkProvinsiController extends Controller
{

    protected $province;

    protected $regency;

    protected $ik;

    public function __construct(Regency $regency, Province $province, IkModel $ik)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->ik       = $ik;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $ik = $this->ik->find($id);

        return response()->json([
            'negara'    => $ik->negara,
            'province'  => $ik->getProvince->name,
            'regencies' => $ik->getRegency->name,
            'tahun'     => $ik->tahun,
            'data'      => $ik->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->ik->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->ik->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'Indikator Kemiskinan '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

