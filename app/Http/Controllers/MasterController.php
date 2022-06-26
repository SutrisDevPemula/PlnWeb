<?php

namespace App\Http\Controllers;

use App\Models\categori;
use App\Models\daya;
use App\Models\informasi;
use App\Models\pelayanan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function categoryForUser()
    {
        //
        // $category = categori::orderBy('id', 'desc')->paginate(5);
        // $content = informasi::orderBy('id_categori', 'desc')->paginate(5);
        $active = "active";
        $informasi = informasi::where('id_categori', '4')->orderBy('id', 'desc')->paginate(6);
        return view('users.index', compact('informasi'));
    }

    public function daftarInformasi()
    {
        $nav = "Daftar Informasi";
        $menu = "active";
        $category = categori::all();
        return view('admin.pages.daftar_informasi', compact('nav', 'menu', 'category'));
    }

    // public function getContent($id)
    // {
    //     //
    //     $category = categori::paginate(5);
    //     $content = informasi::where('id_categori', $id)->first();
    //     // $nav = "Category";
    //     $active = "active";

    //     return view('users.index', compact('category', 'content', 'active'));
    // }

    public function category()
    {
        //
        $category = categori::all();
        $nav = "Category";
        $menu = "active";

        return view('admin.pages.master.category', compact('category', 'nav', 'menu'));
    }

    public function getCategoty(Request $request)
    {
        $categoryData = categori::where('category', 'like', '%' . $request->category . '%')->get();
        $list = array();
        $key = 0;

        foreach ($categoryData as $data) {
            $list[$key]['text'] = $data->category;
            $key++;
        }


        echo json_encode($list);
    }

    public function postDataCategory(Request $request)
    {

        $category = new categori;

        $category->category = $request->category;
        $category->description = $request->description;

        $category->save();

        return back()->with('success', 'Data Category Berhasil Ditambahkan');
    }

    public function getDataCategory($id)
    {
        $data['id'] = categori::where('id', '=', $id)->value('id');
        $data['category'] = categori::where('id', '=', $id)->value('category');
        $data['description'] = categori::where('id', '=', $id)->value('description');
        $response = json_encode($data);
        // dd($arr);

        echo $response;
    }

    public function updateDataCategory(Request $request)
    {
        categori::where('id', '=', $request->categoryId)->update([
            'category' => $request->category,
            'description' => $request->description
        ]);

        // dd($category);

        return back()->with('success', 'Data Category Berhasil Diupdate');
    }

    public function deleteDataCategory(Request $request)
    {

        categori::where('id', '=', $request->id)->delete();

        return back()->with('status', 'delete data successfully');;
    }


    public function layanan()
    {
        $layanan = pelayanan::all();
        $nav = "Pelayanan Pelanggan";
        $menu_daya = "active";

        return view('admin.pages.master.layanan', compact('layanan', 'nav', 'menu_daya'));
    }

    public function postDataLayanan(Request $request)
    {

        $daya = new pelayanan();

        $daya->jenis_layanan = $request->layanan;
        $daya->tarif_pemasangan = $request->tarif;
        $daya->syarat_ketentuan = $request->syarat;
        // $daya->biaya_slo = $request->slo;

        $daya->save();

        return back()->with('success', 'Data Layanan Berhasil Ditambahkan');
    }

    public function getDataLayanan($id)
    {
        $data['id'] = pelayanan::where('id', '=', $id)->value('id');
        $data['layanan'] = pelayanan::where('id', '=', $id)->value('jenis_layanan');
        $data['tarif'] = pelayanan::where('id', '=', $id)->value('tarif_pemasangan');
        $data['syarat'] = pelayanan::where('id', '=', $id)->value('syarat_ketentuan');
        $response = json_encode($data);
        // dd($arr);

        echo $response;
    }

    public function updateDataLayanan(Request $request)
    {
        pelayanan::where('id', '=', $request->id)->update([
            'jenis_layanan' => $request->layanan,
            'tarif_pemasangan' => $request->tarif,
            'syarat_ketentuan' => $request->syarat,
        ]);

        // dd($category);

        return back()->with('success', 'Data Layanan Berhasil Diupdate');
    }

    public function deleteDataLayanan(Request $request)
    {

        pelayanan::where('id', '=', $request->id)->delete();

        return back()->with('status', 'delete data successfully');;
    }


    public function daya()
    {
        $daya = daya::all();
        $nav = "Daya Listrik";
        $menu_daya = "active";

        return view('admin.pages.master.daya', compact('daya', 'nav', 'menu_daya'));
    }

    public function postDataDaya(Request $request)
    {

        $daya = new daya();

        $daya->jumlah_daya = $request->daya;
        $daya->angsuran = $request->angsuran;
        $daya->biaya_ppj = $request->ppj;
        $daya->biaya_slo = $request->slo;

        $daya->save();

        return back()->with('success', 'Data Daya Berhasil Ditambahakan');
    }

    public function getDataDaya($id)
    {
        $data['id'] = daya::where('id', '=', $id)->value('id');
        $data['daya'] = daya::where('id', '=', $id)->value('jumlah_daya');
        $data['angsuran'] = daya::where('id', '=', $id)->value('angsuran');
        $data['ppj'] = daya::where('id', '=', $id)->value('biaya_ppj');
        $data['slo'] = daya::where('id', '=', $id)->value('biaya_slo');
        $response = json_encode($data);
        // dd($arr);

        echo $response;
    }

    public function updateDataDaya(Request $request)
    {
        daya::where('id', '=', $request->id)->update([
            'jumlah_daya' => $request->daya,
            'angsuran' => $request->angsuran,
            'biaya_ppj' => $request->ppj,
            'biaya_slo' => $request->slo
        ]);

        // dd($category);

        return back()->with('success', 'Data Daya Berhasil Diupdate');
    }

    public function deleteDataDaya(Request $request)
    {

        daya::where('id', '=', $request->id)->delete();

        return back()->with('status', 'delete data successfully');
    }

    public function informasi()
    {
        $nav = "Informasi";
        $menu = "active";
        $category = categori::all();
        $infor = informasi::all();
        return view('admin.pages.informasi', compact('nav', 'menu', 'category', 'infor'));
    }

    public function informasiPost(Request $request)
    {
        $informasi = new informasi();

        $informasi->id_admin = '1';
        $informasi->id_categori = $request->category;
        $informasi->judul = $request->title;
        // $informasi->slug = 
        $informasi->description = $request->desc;

        if ($request->file('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            $file = $request->file('image');
            $filename = date('YmdHi') . "-" . $file->getClientOriginalName();
            $file->move(public_path('informasi'), $filename);
            $informasi->img = $filename;
        }
        $informasi->save();

        return back()->with('success', 'post data information successfully');
    }

    public function editInformasiPost(Request $request)
    {
        $image = "";

        if ($request->file('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            $file = $request->file('image');
            $filename = date('YmdHi') . "-" . $file->getClientOriginalName();
            $file->move(public_path('informasi'), $filename);
            // $informasi->img = $filename;
            $image = $filename;
        }

        if ($image != "") {
            informasi::where('id', $request->id_informasi)->update([
                "id_admin" => '1',
                "id_categori" => $request->category,
                "judul" => $request->title,
                "description" => $request->desc,
                "img" => $image,
            ]);
        } else {
            informasi::where('id', $request->id_informasi)->update([
                "id_admin" => '1',
                "id_categori" => $request->category,
                "judul" => $request->title,
                "description" => $request->desc,
                // "img" => $image,
            ]);
        }
        return back()->with('success', 'Edit information successfully');
    }

    public function userInformation(Request $request)
    {

        // dd($request);
        if ($request->category != null) {
            // dd("null");
            $getCategory = categori::where('id', $request->category)->first();
            $category = categori::all();
            $informasi = informasi::where('id_categori', $request->category)->paginate(9);
            return view('users.pages.informasi', compact('category', 'informasi', 'getCategory'), ["info" => $informasi]);
        } else {
            // dd("ada");
            $category = categori::all();
            $informasi = informasi::paginate(9);
            return view('users.pages.informasi', compact('category', 'informasi'), ["info" => $informasi]);
        }
    }

    public function getUserInformation($id)
    {
        $id_category = informasi::where('slug', $id)->value('id_categori');
        $category = categori::paginate('6');
        $splashInfo = informasi::where('id_categori', $id_category)->orderBy('id', 'desc')->paginate('6');
        $informasi = informasi::where('slug', $id)->first();
        // dd($id_category);
        return view('users.pages.informasi_detail', compact('informasi', 'category', 'splashInfo'));
    }

    public function getUserInformationByCategory($id)
    {
        $id_category = informasi::where('id_categori', '=', $id)->value('id_categori');
        $category = categori::paginate('6');
        $splashInfo = informasi::where('id_categori', $id_category)->orderBy('id', 'desc')->paginate('6');
        $informasi = informasi::where('id_categori', $id)->orderBy('id', 'desc')->first();
        // dd($id_category);
        return view('users.pages.informasi_detail', compact('informasi', 'category', 'splashInfo'));
    }

    public function actionInformasi(Request $request)
    {
        if ($request->status_acton == "delete") {
            try {
                informasi::where('id', $request->id_delete)->delete();
                echo ("success");
                exit;
            } catch (Exception $e) {
                echo ('failed' . $e);
                exit;
            }
        }
    }

    public function editInformasi($id)
    {
        $nav = "Informasi / Edit Informasi";
        $menu = "active";
        $category = categori::all();
        $informasi = informasi::join('tbl_category', 'tbl_informasi_umum.id_categori', '=', 'tbl_category.id')
            ->select(
                'tbl_informasi_umum.judul',
                'tbl_category.category',
                'tbl_informasi_umum.slug',
                'tbl_informasi_umum.created_at',
                'tbl_informasi_umum.id',
                'tbl_informasi_umum.description',
                'tbl_informasi_umum.img'
            )
            ->where('tbl_informasi_umum.id', $id)
            ->first();

        // dd($informasi);
        return view('admin.pages.edit_informasi', compact('category', 'nav', 'menu', 'informasi'));
    }

    public function dataTablePost()
    {
        // return datatables()::of(informasi::limit(10))->make(true);
        return datatables()
            ->of(
                informasi::join('tbl_category', 'tbl_informasi_umum.id_categori', '=', 'tbl_category.id')
                    ->select('tbl_informasi_umum.judul', 'tbl_category.category', 'tbl_informasi_umum.slug', 'tbl_informasi_umum.created_at', 'tbl_informasi_umum.id')
                    ->get()
            )
            ->addColumn('judul', function ($post) {
                return substr($post->judul, 0, 50) . '....';
            })
            ->addColumn('category', function ($post) {
                return  $post->category;
            })
            ->addColumn('slug', function ($post) {
                return substr($post->slug, 0, 50) . '....';
            })
            ->addColumn('tanggal', function ($post) {
                // return $post->created_at;
                $date = date_create($post->created_at);
                return date_format($date, ('d - M - Y'));
            })
            ->addColumn('aksi', function ($post) {
                return '<a href="' . route('edit.informasi', ['id' => $post->id]) . '" class="btn_update" id="' . $post->id . '" data-id_update="' . $post->id . '">
                <i class="fa-solid fa-2x fa-square-pen text-info me-1"></i></a>'
                    . '<a href="#"  class="btn_delete"  id="' . $post->id . '" data-id_delete="' . $post->id . '">
              <i class="fa-solid fa-2x fa-eraser text-danger"></i></a>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }
}
