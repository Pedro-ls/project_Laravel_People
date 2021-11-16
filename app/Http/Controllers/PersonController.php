<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $people = User::all();

            return view("user.list", [
                "people" => $people
            ]);
        } catch (Exception $ex) {
            return redirect()->back()->withErrors(
                [
                    "default" => "Algum erro desconhecido"
                ]
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("user.show", ['person' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("user.update", [
            "person" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, User $user)
    // {

    //     $user->fullname = $request->fullname;
    //     $user->email = $request->email;

    //     if ($user->password != "" && $request->password_confirm != "") {
    //         $user->password = $request->password;

    //         if ($request->password_confirm != $request->password) {
    //             return back()->withErrors(
    //                 [
    //                     "password" => "Senhas não são iguais",
    //                     "password_confirmation" => "Senhas não são iguais",
    //                 ]
    //             );
    //         }
    //     }


    //     $user->state = $request->state;
    //     $user->district = $request->district;
    //     $user->city = $request->city;
    //     $user->number = $request->number;
    //     $user->job = $request->job;
    //     $user->locate = $request->locate;

    //     $user->save();
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (Exception $ex) {
            return redirect()->back()->withErrors(
                [
                    "default" => "Algum erro desconhecido"
                ]
            );
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();

            return  redirect()->route("login");
        } catch (Exception $ex) {
            return redirect()->back()->withErrors(
                [
                    "default" => "Algum erro desconhecido"
                ]
            );
        }
    }

    public function account()
    {
        return view("profile.user");
    }

    public function alter()
    {
        try {
            $user = Auth::user();
            return view("user.update", [
                "person" => $user
            ]);
        } catch (Exception $ex) {
            return redirect()->back()->withErrors(
                [
                    "default" => "Algum erro desconhecido"
                ]
            );
        }
    }

    public function deleteAccount()
    {
        try {
            User::where("id", Auth::user()->id)->delete();
            Auth::logout();
            return redirect()->route("login");
        } catch (Exception $ex) {
            return redirect()->back()->withErrors(
                [
                    "default" => "Algum erro desconhecido"
                ]
            );
        }
    }

    public function updateAccount(Request $request)
    {
        try {
            $user = User::find(Auth::user()->id);


            $request->validate([
                "fullname" => 'required|string|max:255',
                "job" => 'required|string|max:255',
                "locate" => 'required|string|max:255',
                "number" => 'required|string|max:255',
                "city" => 'required|string|max:255',
                "district" => 'required|string|max:255',
                "state" => 'required|string|max:255',
                'email' => $request->email == $user->email ?  'required|string|email|max:255' : 'required|string|email|max:255|unique:users',
                'password' => 'confirmed'
            ]);



            $user->fullname = trim($request->fullname);
            $user->email = trim($request->email);
            $request->password = trim($request->password);
            $request->password_confirmation = trim($request->password_confirmation);


            if (!($request->password == null && $request->password_confirmation == null)) {

                if ($request->password == $request->password_confirmation) {
                    $user->password = Hash::make($request->password);
                } else {

                    return redirect()->back()->with(
                        [
                            "error" => "Sua confirmação é diferente da sua senha"
                        ]
                    );
                }
            }



            $user->state = trim($request->state);
            $user->district = trim($request->district);
            $user->city = trim($request->city);
            $user->number = trim($request->number);
            $user->job = trim($request->job);
            $user->locate = trim($request->locate);

            $user->update();

            Auth::user()->fullname = $user->fullname;
            Auth::user()->email = $user->email;
            Auth::user()->state = $user->state;
            Auth::user()->district = $user->district;
            Auth::user()->city = $user->city;
            Auth::user()->number = $user->number;
            Auth::user()->job = $user->job;
            Auth::user()->locate = $user->locate;

            return redirect()->back()->with(
                [
                    "success" => "Usuário atualizado com sucesso!!!"
                ]
            );
        } catch (Exception $ex) {
            return redirect()->back()->withErrors(
                [
                    "default" => "Algum erro desconhecido"
                ]
            );
        }
    }
}
