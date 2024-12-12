<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //

    public function index()
    {

        $user = Auth::user();
        $categories = Category::all();
        $count = Course::select('category_id', DB::raw('count(*) as total_courses'))
            ->groupBy('category_id')
            ->get();

        $type = 'dashboard';

        // echo($count);

        // dd($id->is_admin);

        if ($user->is_admin === 1) {
            $courses = Course::all();
            return view('admin.dashboard', ['user' => $user, 'categories' => $categories, 'courses' => $courses, 'count' => $count, 'type' => $type]);
        } else {
            $courses = Course::limit(4)->get();
            return view('dashboard', ['categories' => $categories, 'courses' => $courses, 'count' => $count]);

        }

    }

    public function addCategory(Request $req)
    {

        $category = new Category();

        // Use the $req object to access input values
        $category->name = $req->input('name');
        $category->desc = $req->input('description');

        $category->save();

        return redirect()->route('dashboard')->with('success', 'Category added successfully!');
    }

    public function addCourse(Request $req)
    {
        // Add logic to add a new course to the database

        // Use the $req object to access input values
        $course = new Course();
        $course->title = $req->input('name');
        $course->description = $req->input('description');
        $course->category_id = $req->input('category');
        $course->price = $req->input('price');
        $course->image_path = $req->input('image');

        $type = 'addCourse';

        // dd($course);
        $course->save();

        return redirect()->route('dashboard')->with(['success' => 'Course added successfully!', 'type' => $type]);
    }

    public function contact(Request $req)
    {

        $contact = new Contact();

        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->phoneNumber = $req->input('phone');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('dashboard')->with('success', 'Contact form submitted successfully!');

    }

    public function allCourses()
    {
        $courses = Course::all();

        return view('dashboard', ['courses' => $courses]);
    }

    public function course($id)
    {
        // Course::destroy($id);

        $course = Course::find($id);

        return view('course', ['course' => $course]);

        // return redirect()->route('course', ['course_id' => $id])->with('success', 'Course deleted successfully!');
    }

    public function getCart()
    {

        // $course = Course::find

        $cart = Cart::select('carts.*', 'users.name', 'courses.title as course_name', 'courses.description as description', 'courses.image_path', 'courses.price', 'categories.name as category_name')
            ->leftJoin('courses', 'courses.id', '=', 'carts.course_id')
            ->leftJoin('categories', 'categories.id', '=', 'courses.category_id')
            ->leftJoin('users', 'users.id', '=', 'carts.user_id')
            ->get();

        // dd($cart);

        return view('dashboard', ['courses' => null, 'cart' => $cart]);
    }

    public function addToCart(Request $req, $course_id)
    {
        $user_id = Auth::user()->id;

        $cart = new Cart();

        $cart->user_id = $user_id;
        $cart->course_id = $course_id;

        $course = Course::find($course_id);

        $course->is_cart = true;

        $course->save();
        // dd($cart);
        $cart->save();

        return redirect()->route(url()->previous())->with([
            'success' => 'added to cart!',
            'course_id' => $course_id,
        ]);

    }

    public function removeFromCart($course_id)
    {
        $cart = Cart::find($course_id);

        // $course_id = $cart->course_id;
        // dd($course_id);
        $course = Course::find($cart->course_id);

        // dd($cart);

        $course->is_cart = false;
        $course->save();
        $cart->delete();

        return redirect()->route('getCart')->with([
            'success' => 'Removed from cart!',
            'course_id' => $course_id,
        ]);
    }

    public function edit_course($course_id, Request $req)
    {
        // dd($course_id);

        $course = Course::find($course_id);
        $type = 'editCourse';

        // dd($course);

        return redirect()->route('dashboard')->with(
            [
                'editCourse' => $course,
                'type' => $type,
            ]
        );
    }

    public function editCourse($course_id, Request $req)
    {
        $course = Course::find($course_id);

        // dd($course_id);

        $course->title = $req->input('name');
        $course->description = $req->input('description');
        $course->category_id = $req->input('category');
        $course->price = $req->input('price');
        $course->image_path = $req->input('image');

        // dd($course);

        $course->save();

        return redirect()->route('dashboard')->with('success', 'Course updated successfully!');
    }
}
