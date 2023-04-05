from django.contrib.auth.models import User
from django.db import models

# Create your models here.


class Category(models.Model):
    name = models.CharField(max_length=250)
    slug = models.SlugField(max_length=250)

    def __str__(self):
        return str(self.name)


class Tag(models.Model):
    name = models.CharField(max_length=250)
    slug = models.SlugField(max_length=250)

    def __str__(self):
        return str(self.name)


class Priority(models.Model):
    name = models.CharField(max_length=250)
    slug = models.SlugField(max_length=250)

    def __str__(self):
        return str(self.name)


class Task(models.Model):
    name = models.CharField(max_length=250)
    slug = models.SlugField(max_length=250)
    added_date = models.DateTimeField(auto_now_add=True)
    category = models.ForeignKey(
        Category, on_delete=models.CASCADE, related_name='categories')
    tag = models.ManyToManyField(Tag, related_name='tags')
    done = models.BooleanField(default=False)
    description = models.TextField(blank=True)
    endtime = models.DateTimeField()
    priority = models.ForeignKey(
        Priority, on_delete=models.PROTECT, related_name='tasks')
    author = models.ForeignKey(User, on_delete=models.PROTECT, null=True)

    def __str__(self):
        return str(self.name)
