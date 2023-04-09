from django.contrib.auth.models import User
from django.db import models

# Create your models here.


class Category(models.Model):
    name = models.CharField(max_length=100)
    slug = models.SlugField(max_length=100)

    def __str__(self):
        return self.name


class Article(models.Model):
    name = models.CharField(max_length=255)
    slug = models.SlugField(max_length=255)
    category = models.ForeignKey(
        Category, on_delete=models.PROTECT, related_name='articles')
    published_date = models.DateField(auto_now_add=True)
    view = models.PositiveIntegerField(default=0)
    img = models.ImageField()
    body = models.TextField()
    rating = models.PositiveIntegerField(default=0)

    class Meta:
        ordering = ["-id"]

    def __str__(self):
        return self.name


class Comment(models.Model):
    article = models.ForeignKey(
        Article, on_delete=models.CASCADE, related_name="article_comment")
    author = models.ForeignKey(
        User, on_delete=models.PROTECT, null=True, related_name="author")
    comment = models.TextField()
