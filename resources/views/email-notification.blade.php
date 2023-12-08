@component('mail::message')
<div style="direction:rtl">
<div>
عزيزي العميل 
</div>
<div>
نشكر لكم ثقتكم بطلب الخدمة 
</div>
<div>
نرجو الاطلاع على الاسعار المرفقة 
</div>
<div>
ولطلب التوضيح والتفاصيل نرجو التواصل مع فريق المبيعات
</div>
<div>
نرجو ان تنال خدماتنا رضاكم
</div>
<div>
اجمالي المبلغ {{$input['price']}}
</div>
<div>
الكود الخاص بك {{$input['code']}}  

</div>
</div>

@endcomponent