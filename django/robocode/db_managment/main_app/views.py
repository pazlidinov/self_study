from django.shortcuts import render
from .models import Stacks, Course, Student
# Create your views here.

def testView(request):
    course=Course.objects.all()
    datas={
        "courses":course
    }
    print(course)
    return render(request, "index.html", context=datas)

def search(request):
    # your db managment is here

    # first_stack=Stacks.objects.first()
    # last_stack=Stacks.objects.last()
    
    # print(first_stack)
    # print(last_stack)

    # get
    # one_item=Student.objects.get(name='bekzod')
    # print(one_item)  #faqat bitta elmentchiqaradi
    if request.method =="GET":

        query=request.GET.get("q")

        data_students=Student.objects.filter(name__icontains=query)
        data_stacks=Stacks.objects.filter(name__icontains=query)
        data_course=Course.objects.filter(name__icontains=query)
       
        if (data_stacks or data_students or data_course) and query!='':
            return render(request, 
                        'index.html', 
                        context={"students":data_students,
                                  "course":data_course,
                                  "stacks":data_stacks})
        else:
            return render(request, 'index.html', context={'message':'Result not found'})

    return render(request, "index.html")