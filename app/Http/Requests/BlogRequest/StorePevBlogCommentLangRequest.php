<?php

namespace App\Http\Requests\BlogRequest;

use Illuminate\Foundation\Http\FormRequest;

class StorePevBlogCommentLangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pev_blog_category_id' => ['required', 'numeric'],
            'pev_customer_id' => [],
            'pev_blog_comment_id_parent' => ['required', 'numeric'],
            "name"=> ['max:128'],
            "email"=> ['max:128'],
            "image"=> ['max:128'],
            'active' => ['boolean'],
            // 'pev_blog_comment_id' => ['required', 'numeric'],
            'pev_lang_id' => ['required', 'numeric'],
            "comment"=> ['required'],
            "reviewed"=> ['required', 'date'],
            'active_lang' => ['boolean'],
        ];
    }
}
