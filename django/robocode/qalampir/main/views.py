from django.shortcuts import render

from .models import Article, Category

# Create your views here.


def homepage(request):
    article = Article.objects.all()
    data = {
        'articles': article
    }
    return render(request, 'index.html', context=data)


def detailpage(request, article_slug):
    print(article_slug)
    article = Article.objects.filter(slug=article_slug)
    print(article)
    data = {
        'art': article,
    }
    return render(request, 'detail.html', context=data)


def categorypage(request, category_slug):
    cat = Category.objects.get(slug=category_slug)
    catlist= Article.objects.filter(category=cat)
    print(catlist)
    data = {
        'catlist': catlist
    }
    return render(request, 'category.html', context=data)