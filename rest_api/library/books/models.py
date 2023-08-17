from django.db import models

# Create your models here.


class Book(models.Model):
    title = models.CharField(max_length=150)
    slug = models.SlugField(max_length=150)
    subtitle = models.CharField(max_length=250, blank=True, null=True)
    rating=models.FloatField(default=0, blank=True, null=True)
    image=models.ImageField(upload_to='media/book_image/', blank=True, null=True)
    price=models.FloatField(default=0, blank=True, null=True)
    author = models.CharField(max_length=150, blank=True, null=True)
    author_job=models.CharField(max_length=250, blank=True, null=True)
    about_book=models.TextField()
    isbn = models.CharField(max_length=13, blank=True, null=True)
    book_file=models.FileField(upload_to='media/book_file/', blank=True, null=True)

    def __str__(self):
        return self.title
