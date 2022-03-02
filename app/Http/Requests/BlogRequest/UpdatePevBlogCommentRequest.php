<?php

namespace App\Http\Requests\BlogRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePevBlogCommentRequest extends FormRequest
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
            'pev_blog_category_id' => ['numeric'],
            'pev_customer_id' => ['numeric'],
            'pev_blog_comment_id' => ['numeric'],
            "name"=> ['max:128'],
            "email"=> ['max:128'],
            "image"=> ['max:128'],
            'active' => ['boolean'],
        ];
    }
}
