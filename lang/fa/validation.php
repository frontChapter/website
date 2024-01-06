<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'        => ':attribute باید پذیرفته شده باشد.',
    'active_url'      => 'آدرس :attribute معتبر نیست.',
    'after'           => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal'  => ':attribute باید تاریخی بعد از :date، یا مطابق با آن باشد.',
    'alpha'           => ':attribute باید فقط حروف الفبا باشد.',
    'alpha_dash'      => ':attribute باید فقط حروف الفبا، اعداد، خط تیره و زیرخط باشد.',
    'alpha_num'       => ':attribute باید فقط حروف الفبا و اعداد باشد.',
    'array'           => ':attribute باید آرایه باشد.',
    'before'          => ':attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal' => ':attribute باید تاریخی قبل از :date، یا مطابق با آن باشد.',
    'between'         => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file'    => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string'  => ':attribute باید بین :min و :max کاراکتر باشد.',
        'array'   => ':attribute باید بین :min و :max آیتم باشد.',
    ],
    'boolean'        => 'فیلد :attribute فقط می‌تواند true و یا false باشد.',
    'confirmed'      => ':attribute با فیلد تکرار مطابقت ندارد.',
    'date'           => ':attribute یک تاریخ معتبر نیست.',
    'date_equals'    => ':attribute باید یک تاریخ برابر با تاریخ :date باشد.',
    'date_format'    => ':attribute با الگوی :format مطابقت ندارد.',
    'different'      => ':attribute و :other باید از یکدیگر متفاوت باشند.',
    'digits'         => ':attribute باید :digits رقم باشد.',
    'digits_between' => ':attribute باید بین :min و :max رقم باشد.',
    'dimensions'     => 'ابعاد تصویر :attribute قابل قبول نیست.',
    'distinct'       => 'فیلد :attribute مقدار تکراری دارد.',
    'email'          => ':attribute باید یک ایمیل معتبر باشد.',
    'ends_with'      => 'فیلد :attribute باید با یکی از مقادیر زیر خاتمه یابد: :values',
    'exists'         => ':attribute انتخاب شده، معتبر نیست.',
    'file'           => ':attribute باید یک فایل معتبر باشد.',
    'filled'         => 'فیلد :attribute باید مقدار داشته باشد.',
    'gt'             => [
        'numeric' => ':attribute باید بزرگتر از :value باشد.',
        'file'    => ':attribute باید بزرگتر از :value کیلوبایت باشد.',
        'string'  => ':attribute باید بیشتر از :value کاراکتر داشته باشد.',
        'array'   => ':attribute باید بیشتر از :value آیتم داشته باشد.',
    ],
    'gte' => [
        'numeric' => ':attribute باید بزرگتر یا مساوی :value باشد.',
        'file'    => ':attribute باید بزرگتر یا مساوی :value کیلوبایت باشد.',
        'string'  => ':attribute باید بیشتر یا مساوی :value کاراکتر داشته باشد.',
        'array'   => ':attribute باید بیشتر یا مساوی :value آیتم داشته باشد.',
    ],
    'image'    => ':attribute باید یک تصویر معتبر باشد.',
    'in'       => ':attribute انتخاب شده، معتبر نیست.',
    'in_array' => 'فیلد :attribute در لیست :other وجود ندارد.',
    'integer'  => ':attribute باید عدد صحیح باشد.',
    'ip'       => ':attribute باید آدرس IP معتبر باشد.',
    'ipv4'     => ':attribute باید یک آدرس معتبر از نوع IPv4 باشد.',
    'ipv6'     => ':attribute باید یک آدرس معتبر از نوع IPv6 باشد.',
    'json'     => 'فیلد :attribute باید یک رشته از نوع JSON باشد.',
    'lt'       => [
        'numeric' => ':attribute باید کوچکتر از :value باشد.',
        'file'    => ':attribute باید کوچکتر از :value کیلوبایت باشد.',
        'string'  => ':attribute باید کمتر از :value کاراکتر داشته باشد.',
        'array'   => ':attribute باید کمتر از :value آیتم داشته باشد.',
    ],
    'lte' => [
        'numeric' => ':attribute باید کوچکتر یا مساوی :value باشد.',
        'file'    => ':attribute باید کوچکتر یا مساوی :value کیلوبایت باشد.',
        'string'  => ':attribute باید کمتر یا مساوی :value کاراکتر داشته باشد.',
        'array'   => ':attribute باید کمتر یا مساوی :value آیتم داشته باشد.',
    ],
    'max' => [
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file'    => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string'  => ':attribute نباید بیشتر از :max کاراکتر داشته باشد.',
        'array'   => ':attribute نباید بیشتر از :max آیتم داشته باشد.',
    ],
    'mimes'     => 'فرمت‌های معتبر فایل عبارتند از: :values.',
    'mimetypes' => 'فرمت‌های معتبر فایل عبارتند از: :values.',
    'min'       => [
        'numeric' => ':attribute نباید کوچکتر از :min باشد.',
        'file'    => ':attribute نباید کوچکتر از :min کیلوبایت باشد.',
        'string'  => ':attribute نباید کمتر از :min کاراکتر داشته باشد.',
        'array'   => ':attribute نباید کمتر از :min آیتم داشته باشد.',
    ],
    'not_in'               => ':attribute انتخاب شده، معتبر نیست.',
    'not_regex'            => 'فرمت :attribute معتبر نیست.',
    'numeric'              => ':attribute باید عدد یا رشته‌ای از اعداد باشد.',
    'password'             => 'رمزعبور اشتباه است.',
    'present'              => 'فیلد :attribute باید در پارامترهای ارسالی وجود داشته باشد.',
    'regex'                => 'فرمت :attribute معتبر نیست.',
    'required'             => 'فیلد :attribute الزامی است.',
    'required_if'          => 'هنگامی که :other برابر با :value است، فیلد :attribute الزامی است.',
    'required_unless'      => 'فیلد :attribute الزامی است، مگر آنکه :other در :values موجود باشد.',
    'required_with'        => 'در صورت وجود فیلد :values، فیلد :attribute نیز الزامی است.',
    'required_with_all'    => 'در صورت وجود فیلدهای :values، فیلد :attribute نیز الزامی است.',
    'required_without'     => 'در صورت عدم وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_without_all' => 'در صورت عدم وجود هر یک از فیلدهای :values، فیلد :attribute الزامی است.',
    'same'                 => ':attribute و :other باید همانند هم باشند.',
    'size'                 => [
        'numeric' => ':attribute باید برابر با :size باشد.',
        'file'    => ':attribute باید برابر با :size کیلوبایت باشد.',
        'string'  => ':attribute باید برابر با :size کاراکتر باشد.',
        'array'   => ':attribute باید شامل :size آیتم باشد.',
    ],
    'starts_with' => ':attribute باید با یکی از این ها شروع شود: :values',
    'string'      => 'فیلد :attribute باید متن باشد.',
    'timezone'    => 'فیلد :attribute باید یک منطقه زمانی معتبر باشد.',
    'unique'      => ':attribute قبلا انتخاب شده است.',
    'uploaded'    => 'بارگذاری فایل :attribute موفقیت آمیز نبود.',
    'url'         => ':attribute معتبر نمی‌باشد.',
    'uuid'        => ':attribute باید یک UUID معتبر باشد.',

    'jdate'                  => ':attribute معتبر نمی باشد.',
    'jdate_equal'            => ':attribute برابر :date نمی باشد.',
    'jdate_not_equal'        => ':attribute نامساوی :date نمی باشد.',
    'jdatetime'              => ':attribute معتبر نمی باشد.',
    'jdatetime_equal'        => ':attribute مساوی :date نمی باشد.',
    'jdatetime_not_equal'    => ':attribute نامساوی :date نمی باشد.',
    'jdate_after'            => ':attribute باید بعد از :date باشد.',
    'jdate_after_equal'      => ':attribute باید بعد یا برابر از :date باشد.',
    'jdatetime_after'        => ':attribute باید بعد از :date باشد.',
    'jdatetime_after_equal'  => ':attribute باید بعد یا برابر از :date باشد.',
    'jdate_before'           => ':attribute باید قبل از :date باشد.',
    'jdate_before_equal'     => ':attribute باید قبل یا برابر از :date باشد.',
    'jdatetime_before'       => ':attribute باید قبل از :date باشد.',
    'jdatetime_before_equal' => ':attribute باید قبل یا برابر از :date باشد.',

    'attributes' => [
        'start_date'      => 'تاریخ شروع',
        'expire_datetime' => 'تاریخ انقضا',
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'                              => 'نام',
        'username'                          => 'نام کاربری',
        'email'                             => 'ایمیل',
        'usernameOrEmail'                   => 'نام کاربری یا ایمیل',
        'first_name'                        => 'نام',
        'last_name'                         => 'نام خانوادگی',
        'firstName'                        => 'نام',
        'lastName'                         => 'نام خانوادگی',
        'fatherName'                       => 'نام پدر',
        'father_name'                       => 'نام پدر',
        'password'                          => 'رمز عبور',
        'password_confirmation'             => 'تکرار رمز عبور',
        'passwordConfirmation'             => 'تکرار رمز عبور',
        'city'                              => 'شهر',
        'country'                           => 'کشور',
        'address'                           => 'نشانی',
        'phone'                             => 'شماره ثابت',
        'mobile'                            => 'شماره همراه',
        'age'                               => 'سن',
        'sex'                               => 'جنسیت',
        'gender'                            => 'جنسیت',
        'day'                               => 'روز',
        'month'                             => 'ماه',
        'year'                              => 'سال',
        'hour'                              => 'ساعت',
        'minute'                            => 'دقیقه',
        'second'                            => 'ثانیه',
        'title'                             => 'عنوان',
        'text'                              => 'متن',
        'content'                           => 'محتوا',
        'description'                       => 'توضیحات',
        'excerpt'                           => 'گزیده مطلب',
        'date'                              => 'تاریخ',
        'time'                              => 'زمان',
        'available'                         => 'موجود',
        'size'                              => 'اندازه',
        'terms'                             => 'شرایط',
        'province'                          => 'استان',
        'project_id'                        => 'پروژه',
        'user_id'                           => 'کاربر',
        'area_id'                           => 'زمین',
        'area_id'                           => 'زمین',
        'nationalCode'                      => 'کد ملی',
        'national_code'                     => 'کد ملی',
        'shareholder_code'                  => 'کد سهامداری',
        'birth_date'                        => 'تاریخ تولد',
        'city_of_military_service'          => 'شهر محل خدمت',
        'personnel_id'                      => 'شماره پرسنلی',
        'shaba'                             => 'شماره شبا',
        'bank_number'                       => 'شماره حساب بانکی',
        'bank_name'                         => 'نام بانک',
        'count'                             => 'تعداد سهام',
        'year'                              => 'سال',
        'profit_year'                       => 'سود سال',
        'total_annual_percentage'           => 'کل درصد سود',
        'type'                              => 'نوع',
        'sum_previous_profits_and_capital'  => 'جمع سود و سرمایه قبلی',
        'percentage_capital_increase'       => 'درصد افزایش سرمایه',
        'deposit_amount'                    => 'مبلغ واریزی',
        'selected_stocks'                   => 'سهام‌های انتخاب شده',
        'key'                               => 'کلید',
        'value'                             => 'مقدار',
        'price'                             => 'قیمت',
        'selectedUserIds'                   => 'اعضا انتخاب شده',
        'company'                           => 'شرکت',
        'is_company'                        => 'سهامدار حقوقی',
        'register_date'                     => 'تاریخ ثبت',
        'register_number'                   => 'شماره ثبت',
        'registerNumber'                    => 'شماره ثبت',
        'company_national_code'             => 'شناسه ملی شرکت',
        'companyNationalCode'               => 'شناسه ملی شرکت',
        'economyCode'                       => 'کد اقتصادی',
        'economy_code'                      => 'کد اقتصادی',
        'bank_card_number'                  => 'شماره کارت',
        'bankCardNumber'                    => 'شماره کارت',
        'card_number'                       => 'شماره کارت',
        'avatar'                            => 'آواتار',
        'role'                              => 'نقش',
        'personnel'                         => 'پرسنل',
        "startDate"                         => "تاریخ شروع",
        "finishDate"                        => "تاریخ پایان",
        "start_time"                        => "زمان شروع",
        "end_time"                          => "زمان پایان",
        "status"                            => "وضعیت",
        "unit"                              => "واحد",
        "number"                            => "شماره",
    ],
];
