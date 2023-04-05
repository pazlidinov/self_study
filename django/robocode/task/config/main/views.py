from django.shortcuts import render

from .models import *

# Create your views here.


def home_page(request):
    category = Category.objects.all()

    return render(request, 'index.html', context=({'categories': category}))


def category_list(request, category_slug):
    cat = Category.objects.get(slug=category_slug)
    tasks = Task.objects.filter(category=cat)
    category = Category.objects.all()
    return render(request, 'category_task.html', context={'tasks': tasks, 'categories': category})


def search_page(request):
    category = Category.objects.all()
    if request.method == "GET":
        query = request.GET.get("www")
        print(query)
        data = Task.objects.filter(name__icontains=query)
        if data:
            return render(request, "index.html", context={"object_list": data, 'categories': category})
        else:
            return render(request, "index.html", context={"message": "Result not found !",  'categories': category})

    return render(request, "index.html")


def detail_page(request, task_slug):
    category = Category.objects.all()
    det = Task.objects.filter(slug=task_slug)
    return render(request, "detail.html", context={"dets": det, 'categories': category})
