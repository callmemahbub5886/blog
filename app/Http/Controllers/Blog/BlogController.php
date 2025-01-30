<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'blog' => 'required',
            'description' => 'required',
            'banner' => 'nullable|mimes:png,jpg',
        ]);

        if ($request->hasFile('banner')) {
            $bannerName = Auth()->user()->name . '-' . time() . '-' . rand(0, 9999) . '.' . $request->banner->extension();
            $request->banner->move(public_path('dashboard/assets/images/blogs'), $bannerName);


            DB::table('blogs')->insert([
                'title' => $request->blog,
                'description' => $request->description,
                'banner' => $bannerName,
                'created_at' => now(),
            ]);
            return redirect()->back()->with('success', "Blog uploaded successfully");
        } else {
            DB::table('blogs')->insert([
                'title' => $request->blog,
                'description' => $request->description,
                'created_at' => now(),
            ]);
            return redirect()->back()->with('success', "Blog uploaded successfully");
        }
    }
    public function status(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = $request->boolean('status') ? "active" : "deactive";
        $blog->save();

        return redirect()->back()->with('success', "Status updated successfully");
    }

    // blog-view-page
    public function blog_edit($id)
    {
        $blogs = DB::table('blogs')->where('id', $id)->first();
        return view('dashboard.blog.edit', compact('blogs'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'blog' => 'required',
            'description' => 'required',
            'banner' => 'nullable|mimes:png,jpg|max:2048',
        ]);

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('banner')) {
            if ($blog->banner) {
                $oldImagePath = public_path('dashboard/assets/images/blogs/' . $blog->banner);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            $bannerName = Auth()->user()->name . '-' . time() . '-' . rand(0, 9999) . '.' . $request->banner->extension();
            $request->banner->move(public_path('dashboard/assets/images/blogs'), $bannerName);

            DB::table('blogs')->where('id', $id)->update([
                'title' => $request->blog,
                'description' => $request->description,
                'banner' => $bannerName,
            ]);
            return redirect()->route('blog')->with('success', 'Blog updated successfully');
        } else {
            DB::table('blogs')->where('id', $id)->update([
                'title' => $request->blog,
                'description' => $request->description,
            ]);
            return redirect()->route('blog')->with('success', 'Blog updated successfully');
        };
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blog')->with('success', "Blog deleted successfully");
    }


    public function breaking(Request $request, $id)
    {
        $breaking = Blog::findOrFail($id);
        $breaking->breaking = $request->boolean('breaking') ? 'breaking' : 'normal';
        $breaking->save();
        return redirect()->route('blog')->with('success', "This breaking news ststus is updated");
    }
}
