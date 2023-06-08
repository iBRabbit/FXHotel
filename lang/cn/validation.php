<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | 以下语言行包含验证器类使用的默认错误消息。其中一些规则有多个版本，
    | 例如大小规则。请随意在此处调整每条消息。
    |
    */

    'accepted' => ':attribute 必须被接受。',
    'accepted_if' => '当 :other 是 :value 时，:attribute 必须被接受。',
    'active_url' => ':attribute 不是一个有效的 URL。',
    'after' => ':attribute 必须是 :date 之后的日期。',
    'after_or_equal' => ':attribute 必须是 :date 之后或相等的日期。',
    'alpha' => ':attribute 只能包含字母。',
    'alpha_dash' => ':attribute 只能包含字母、数字、破折号和下划线。',
    'alpha_num' => ':attribute 只能包含字母和数字。',
    'array' => ':attribute 必须是一个数组。',
    'before' => ':attribute 必须是 :date 之前的日期。',
    'before_or_equal' => ':attribute 必须是 :date 之前或相等的日期。',
    'between' => [
        'numeric' => ':attribute 必须介于 :min 和 :max 之间。',
        'file' => ':attribute 必须介于 :min 和 :max 千字节之间。',
        'string' => ':attribute 必须介于 :min 和 :max 个字符之间。',
        'array' => ':attribute 必须包含 :min 到 :max 个项。',
    ],
    'boolean' => ':attribute 字段必须是 true 或 false。',
    'confirmed' => ':attribute 确认不匹配。',
    'current_password' => '密码不正确。',
    'date' => ':attribute 不是一个有效的日期。',
    'date_equals' => ':attribute 必须等于 :date。',
    'date_format' => ':attribute 不符合格式 :format。',
    'declined' => ':attribute 必须被拒绝。',
    'declined_if' => '当 :other 是 :value 时，:attribute 必须被拒绝。',
    'different' => ':attribute 和 :other 必须不同。',
    'digits' => ':attribute 必须是 :digits 位数字。',
    'digits_between' => ':attribute 必须介于 :min 和 :max 位数字之间。',
    'dimensions' => ':attribute 具有无效的图像尺寸。',
    'distinct' => ':attribute 字段具有重复的值。',
    'email' => ':attribute 必须是一个有效的电子邮件地址。',
    'ends_with' => ':attribute 必须以以下之一结尾: :values。',
    'enum' => '所选的 :attribute 无效。',
    'exists' => '所选的 :attribute 无效。',
    'file' => ':attribute 必须是一个文件。',
    'filled' => ':attribute 字段必须有一个值。',
    'gt' => [
        'numeric' => ':attribute 必须大于 :value。',


        'file' => ':attribute 必须大于 :value 千字节。',
        'string' => ':attribute 必须大于 :value 个字符。',
        'array' => ':attribute 必须有多于 :value 个项。',
    ],
    'gte' => [
        'numeric' => ':attribute 必须大于或等于 :value。',
        'file' => ':attribute 必须大于或等于 :value 千字节。',
        'string' => ':attribute 必须大于或等于 :value 个字符。',
        'array' => ':attribute 必须有 :value 个项或更多。',
    ],
    'image' => ':attribute 必须是一张图片。',
    'in' => '所选的 :attribute 无效。',
    'in_array' => ':attribute 字段在 :other 中不存在。',
    'integer' => ':attribute 必须是一个整数。',
    'ip' => ':attribute 必须是一个有效的 IP 地址。',
    'ipv4' => ':attribute 必须是一个有效的 IPv4 地址。',
    'ipv6' => ':attribute 必须是一个有效的 IPv6 地址。',
    'json' => ':attribute 必须是一个有效的 JSON 字符串。',
    'lt' => [
        'numeric' => ':attribute 必须小于 :value。',
        'file' => ':attribute 必须小于 :value 千字节。',
        'string' => ':attribute 必须小于 :value 个字符。',
        'array' => ':attribute 必须有少于 :value 个项。',
    ],
    'lte' => [
        'numeric' => ':attribute 必须小于或等于 :value。',
        'file' => ':attribute 必须小于或等于 :value 千字节。',
        'string' => ':attribute 必须小于或等于 :value 个字符。',
        'array' => ':attribute 不能有多于 :value 个项。',
    ],
    'mac_address' => ':attribute 必须是一个有效的 MAC 地址。',
    'max' => [
        'numeric' => ':attribute 不能大于 :max。',
        'file' => ':attribute 不能大于 :max 千字节。',
        'string' => ':attribute 不能大于 :max 个字符。',
        'array' => ':attribute 不能有多于 :max 个项。',
    ],
    'mimes' => ':attribute 必须是以下类型的文件: :values。',
    'mimetypes' => ':attribute 必须是以下类型的文件: :values。',
    'min' => [
        'numeric' => ':attribute 必须至少为 :min。',
        'file' => ':attribute 必须至少为 :min 千字节。',
        'string' => ':attribute 必须至少为 :min 个字符。',
        'array' => ':attribute 必须至少有 :min 个项。',
    ],
    'multiple_of' => ':attribute 必须是 :value 的倍数。',
    'not_in' => '所选的 :attribute 无效。',
    'not_regex' => ':attribute 格式无效。',
    'numeric' => ':attribute 必须是一个数字。',
    'password' =>

 '密码不正确。',
    'present' => ':attribute 字段必须存在。',
    'prohibited' => ':attribute 字段是禁止的。',
    'prohibited_if' => '当 :other 为 :value 时，:attribute 字段是禁止的。',
    'prohibited_unless' => '除非 :other 在 :values 中，否则 :attribute 字段是禁止的。',
    'prohibits' => ':attribute 字段禁止 :other 出现。',
    'regex' => ':attribute 格式无效。',
    'required' => ':attribute 字段是必需的。',
    'required_array_keys' => ':attribute 字段必须包含以下条目: :values。',
    'required_if' => '当 :other 为 :value 时，:attribute 字段是必需的。',
    'required_unless' => '除非 :other 在 :values 中，否则 :attribute 字段是必需的。',
    'required_with' => '当 :values 存在时，:attribute 字段是必需的。',
    'required_with_all' => '当 :values 存在时，:attribute 字段是必需的。',
    'required_without' => '当 :values 不存在时，:attribute 字段是必需的。',
    'required_without_all' => '当 :values 都不存在时，:attribute 字段是必需的。',
    'same' => ':attribute 和 :other 必须匹配。',
    'size' => [
        'numeric' => ':attribute 必须为 :size。',
        'file' => ':attribute 必须为 :size 千字节。',
        'string' => ':attribute 必须为 :size 个字符。',
        'array' => ':attribute 必须包含 :size 个项。',
    ],
    'starts_with' => ':attribute 必须以以下内容之一开头: :values。',
    'string' => ':attribute 必须是一个字符串。',
    'timezone' => ':attribute 必须是一个有效的时区。',
    'unique' => ':attribute 已经被使用。',
    'uploaded' => ':attribute 上传失败。',
    'url' => ':attribute 必须是一个有效的 URL。',
    'uuid' => ':attribute 必须是一个有效的 UUID。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | 在这里，您可以为属性指定自定义验证消息，使用约定"attribute.rule"来命名这些行。这样可以为给定的属性规则指定一个特定的自定义语言行。
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | 以下语言行用于将我们的属性占位符与某些更易读的内容进行交换，例如将 "E-Mail Address" 替换为 "电子邮件地址"，而不是 "email"。这仅仅是帮助我们使消息更具表现力的一种方式。
    |
    */

    'attributes' => [],

];
    