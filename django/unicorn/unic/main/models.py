from django.db import models

# Create your models here.
class Book(models.Model):
    name = models.CharField(max_length=150)
    slug=models.SlugField(max_length=150)
    