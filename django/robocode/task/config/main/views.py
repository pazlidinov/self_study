from django.shortcuts import render

from .models import *

# Create your views here.


def home_page(request):
    return render(request, 'index.html')


def category_list(request, category_slug):
    cat = Category.objects.get(slug=category_slug)
    tasks = Task.objects.filter(category=cat)
    return render(request, 'category_task.html', context={'tasks': tasks})


def search_page(request):
    if request.method == "GET":
        query = request.GET.get("www")
        print(query)
        data = Task.objects.filter(name__icontains=query)
        if data:
            return render(request, "index.html", context={"object_list": data})
        else:
            return render(request, "index.html", context={"message": "Result not found !"})
    return render(request, "index.html")


def detail_page(request, task_slug):
    det = Task.objects.filter(slug=task_slug)
    return render(request, "detail.html", context={"dets": det})
