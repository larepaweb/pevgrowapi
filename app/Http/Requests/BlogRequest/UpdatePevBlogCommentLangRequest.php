<?php

namespace App\Http\Requests\BlogRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePevBlogCommentLangRequest extends FormRequest
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
            'pev_blog_comment_id' => ['numeric'],
            'pev_lang_id' => ['numeric'],
            "comment"=> [],
            "reviewed"=> ['date'],
            'active_lang' => ['boolean'],
        ];
    }
}
