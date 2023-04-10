from django.shortcuts import render

from .models import Article, Category, Comment

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
    articles = Article.objects.get(slug=article_slug)
    article_comments = articles.article_comment.all()
    print(article)
    data = {
        'art': article,
        'art_com': article_comments
    }
    return render(request, 'detail.html', context=data)


def categorypage(request, category_slug):
    cat = Category.objects.get(slug=category_slug)
    catlist = Article.objects.filter(category=cat)
    print(catlist)
    data = {
        'catlist': catlist
    }
    return render(request, 'category.html', context=data)


def deletepage(request, comment_id):
    # com = Comment.objects.get(id=comment_id)
    # com.delete()
    # # print(com.article_slug)
    # return redirect("/''/detail/"+com.article.slug)
    try:
        com = Comment.objects.get(pk=comment_id)
        com.delete()
    except Comment.DoesNotExist:
        comment = None
    return redirect('/')